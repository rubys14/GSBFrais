<?php

namespace App\Controllers;

class Accueil extends BaseController
{
    public function __construct()
    {
        // On charge le helper URL et HTML
        helper(['url', 'html']);
    }

    /** Méthode par défaut */
    public function index()
    {
        // Vérifie si l’utilisateur est connecté
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data['titre'] = "Bienvenue sur l'intranet GSB";

        $articles = $this->fluxRSS();
        $data["actus"] = $articles;

        return view('structures/page_entete')
            . view('structures/messages')
            . view('sommaire')
            . view('structures/contenu_entete', $data)
            . view('actualites', $data)
            . view('structures/page_pied');
    }

    public function fluxRSS()
    {
        // déclaration
        $url = 'https://www.santemagazine.fr/feeds/rss/sante';
        $articles = [];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // temporaire si pas openssl
        $data = curl_exec($ch);
        curl_close($ch);

        $fluxRSS = simplexml_load_string($data);

        // Vérifie si le chargement du flux a réussi
        if ($fluxRSS === false) {
            return array("error" => "Impossible de charger le flux RSS.");
        }

        if ($fluxRSS) {
            foreach ($fluxRSS->channel->item as $items) {
                $articles[] = [
                    "titre" => $items->title,
                    "description" => $items->description,
                    "lien" => $items->link,
                    "date" => $items->pubDate,
                    "image" => $items->enclosure["url"]
                ];
            }
        }
        return $articles;
    }
}
