<?php
/*
Plugin Name: Shortcodes pour le site.
Description: Plugin fournissant des shortcodes pour ce magnifique site de trottinette électrique.
Author: Aurel (le grand sage).
Version: 1.0.0
*/

/* DEBUT utils*/

function getStars($note)
{
    $note = intval($note);
    $ret  = '<span>';
    for ($i = 0; $i < $note; $i++) {
        $ret .= '<span class="fa fa-star checked"></span>';
    }
    for ($i = $note; $i < 5; $i++) {
        $ret .= '<span class="fa fa-star"></span>';
    }
    $ret .= '</span>';
    return $ret;
}
/* END utils*/

/*DEBUT shortcode recap test trottinette */

function recap_trottinette($atts)
{
    $atts = shortcode_atts(array(
        'nom' => 'pas de nom',
        'lienimage' => '',
        'lienoffre' => '',
        'pointsforts' => '',
        'pointsfaibles' => '',
        'autonomie' => '0',
        'vitesse' => '0',
        'confort' => '0',
        'priseenmain' => '0',
        'finition' => '0',
        'transportabilite' => '0',
        'qualiteprix' => '0',
        'notefinale' => '0'
    ), $atts, 'recap');
    
    
    $ret = '<h2>Le récap\' de la ' . $atts['nom'] . '</h2>
<div id="wrapper-resume">
<div id="resume-produit">
<div class="ligne-perso">
<div class="col-perso-5"><img src="' . $atts['lienimage'] . '" width="200"></div>
<div class="col-perso-5 col-center">
<table>
<tbody><tr>
<td>
<h6>Sur Amazon</h6>
</td>
<td class="vendor-button">
<a href="' . $atts['lienoffre'] . '" class="bouton-fiche-principale" target="_blank">
<span class="fa fa-cart-arrow-down"></span> Voir
</a>
</td>
</tr>
</tbody></table>
</div>
</div>
<div class="ligne-perso">
<div class="col-perso-5" id="points-forts">
<h6>Les points forts</h6>';
$ret .= '<ul>';
    if ($atts['pointsforts'] != "") {
      
        $array = explode(";", $atts['pointsforts']);
        
        foreach ($array as &$pointFort) {
            $ret .= '<li>
    <i class="fa fa-check" aria-hidden="true"></i>
   ' . $pointFort . '
    </li>';
        }
    
    }
    else{
      $ret.='<li>Pas de points forts.</li>';
    }
    $ret .= '</ul>';
    $ret .= '
    </div>
    <div class="col-perso-5" id="points-faibles"><h6>Les points faibles</h6>
    ';
    $ret .= '<ul>';
    if ($atts['pointsfaibles'] != "") {
       
        $array = explode(";", $atts['pointsfaibles']);
        foreach ($array as &$pointFort) {
            $ret .= '<li>
    <i class="fa fa-times" aria-hidden="true"></i>
   ' . $pointFort . '
    </li>';
        }

    }
    else{
      $ret.='<li>Pas de points faibles.</li>';
    }
    
    $ret .= '</ul>';
    
    $ret .= '
</div>
</div>
<div class="ligne-perso">
<div class="col-perso-10">
<h6>Critères du test</h6>
<table>
<tbody><tr>
<td>
Autonomie
</td>
<td>
' . getStars($atts['autonomie']) . '
</td>
</tr>
<tr>
<td>
Vitesse
</td>
<td>
' . getStars($atts['vitesse']) . '
</td>
</tr><tr>
<td>
Confort et sécurité
</td>
<td>
' . getStars($atts['confort']) . '
</td>
</tr>
<tr>
<td>
Prise en main
</td>
<td>
' . getStars($atts['priseenmain']) . '
</td>
</tr>
<tr>
<td>
Finition
</td>
<td>
' . getStars($atts['finition']) . '
</td>
</tr>
<tr>
<td>
Transportabilité
</td>
<td>
' . getStars($atts['transportabilite']) . '
</td>
</tr>
<tr>
<td>
Qualité/Prix
</td>
<td>
' . getStars($atts['qualiteprix']) . '
</td>
</tr></tbody></table>
</div>
</div>
<div class="ligne-perso">
<div class="col-perso-10">
<table>
<tbody><tr>
<td>
<h6>Notre note</h6>
</td>
<td class="note-finale-stars">
' . getStars($atts['notefinale']) . '
</td>
</tr>
</tbody></table>
</div>
</div>
</div>
</div>';
    return $ret;
}
add_shortcode('recap', 'recap_trottinette');

/*FIN shortcode recap test trottinette */
/* DEBUT shortcode tableau comparatif */

function tableau_compartif_trottinettes($atts)
{
    $atts = shortcode_atts(array(
        'nom1' => 'Pas de nom',
        'lienimage1' => '#',
        'vitessemax1' => '0',
        'autonomie1' => '0',
        'tempscharge1' => '0',
        'agemin1' => '0',
        'niveau1' => '0',
        'poidsv1' => '0',
        'poidsc1' => '0',
        'lientest1' => '#',
        'lienoffre1' => '#',
        'note1' => '5',
        'nom2' => 'Pas de nom',
        'lienimage2' => '#',
        'vitessemax2' => '0',
        'autonomie2' => '0',
        'tempscharge2' => '0',
        'agemin2' => '0',
        'niveau2' => '0',
        'poidsv2' => '0',
        'poidsc2' => '0',
        'lientest2' => '#',
        'lienoffre2' => '#',
        'note2' => '5',
        'nom3' => 'Pas de nom',
        'lienimage3' => '#',
        'vitessemax3' => '0',
        'autonomie3' => '0',
        'tempscharge3' => '0',
        'agemin3' => '0',
        'niveau3' => '0',
        'poidsv3' => '0',
        'poidsc3' => '0',
        'lientest3' => '#',
        'lienoffre3' => '#',
        'note3' => '5'
    ), $atts, 'comparer');
    
    $ret = '<div class="conteneur-tableau-responsive" ><table class="comparatif comparatifAdulte">
<tbody>
<tr class="odd">
<td></td>
<td>' . $atts['nom1'] . '</td>
<td>' . $atts['nom2'] . '</td>
<td>' . $atts['nom3'] . '</td>
</tr>

<tr class="even">
<td></td>
<td><img src="' . $atts['lienimage1'] . '">
</td>
<td><img src="' . $atts['lienimage2'] . '">
</td>
<td><img src="' . $atts['lienimage3'] . '"></td>
</tr>

<tr class="odd">
<td>Vitesse max</td>
<td><div><span>' . $atts['vitessemax1'] . ' Km/h</span></div></td>
<td><div><span>' . $atts['vitessemax2'] . ' Km/h</span></div></td>
<td><div><span>' . $atts['vitessemax3'] . ' Km/h</span></div></td>
</tr>

<tr class="even">
<td>Autonomie</td>
<td><div><span>' . $atts['autonomie1'] . ' Km</span></div></td>
<td><div><span>' . $atts['autonomie2'] . ' Km</span></div></td>
<td><div><span>' . $atts['autonomie3'] . ' Km</span></div></td>
</tr>

<tr class="odd">
<td>Temps de charge</td>
<td><div><span>' . $atts['tempscharge1'] . '</span></div></td>
<td><div><span>' . $atts['tempscharge2'] . '</span></div></td>
<td><div><span>' . $atts['tempscharge3'] . '</span></div></td>
</tr>

<tr class="even">
<td>Âge minimum</td>
<td><div><span>' . $atts['agemin1'] . ' ans</span></div></td>
<td><div><span>' . $atts['agemin2'] . ' ans</span></div></td>
<td><div><span>' . $atts['agemin3'] . ' ans</span></div></td>
</tr>

<tr class="odd">
<td>Niveau</td>
<td><div><span>' . $atts['niveau1'] . '</span></div></td>
<td><div><span>' . $atts['niveau2'] . '</span></div></td>
<td><div><span>' . $atts['niveau3'] . '</span></div></td>
</tr>

<tr class="even">
<td>Poids max du conducteur</td>
<td><div><span>' . $atts['poidsc1'] . ' Kg</span></div></td>
<td><div><span>' . $atts['poidsc2'] . ' Kg</span></div></td>
<td><div><span>' . $atts['poidsc3'] . ' Kg</span></div></td>
</tr>

<tr class="odd">
<td>Poid du vehicule</td>
<td><div><span>' . $atts['poidsv1'] . ' Kg</span></div></td>
<td><div><span>' . $atts['poidsv2'] . ' Kg</span></div></td>
<td><div><span>' . $atts['poidsv3'] . ' Kg</span></div></td>
</tr>

<tr class="even">
<td>Notre avis</td>
<td>
<div>
<a href="' . $atts['lientest1'] . '" class="bouton-fiche-principale">Voir la fiche détaillée</a>
</div>
</td>
<td>
<div>
<a href="' . $atts['lientest2'] . '" class="bouton-fiche-principale">Voir la fiche détaillée</a>
</div>
</td>
<td>
<div>
<a href="' . $atts['lientest3'] . '" class="bouton-fiche-principale">Voir la fiche détaillée</a>
</div>
</td>
</tr>
<tr class="odd">
<td>Notre note</td>
<td><div><span>
' . getStars($atts['note1']) . '
</span></div></td>
<td><div><span>
' . getStars($atts['note2']) . '
</span></div></td>
<td><div><span>
' . getStars($atts['note3']) . '
</span></div></td>
</tr>
<tr>
<td>Sur amazon</td>
<td>
<div>
<a href="' . $atts['lienoffre1'] . '" class="bouton-fiche-principale" target="_blank">
<span class="fa fa-cart-arrow-down"></span>
Voir sur amazon
</a>
</td>
</div>
<td>
<div>
<a href="' . $atts['lienoffre2'] . '" class="bouton-fiche-principale" target="_blank">
<span class="fa fa-cart-arrow-down"></span>
Voir sur amazon
</a>
</td>
</div>
<td>
<div>
<a href="' . $atts['lienoffre3'] . '" class="bouton-fiche-principale" target="_blank">
<span class="fa fa-cart-arrow-down"></span>
Voir sur amazon
</a>
</div>
</td>
</tr>
</tbody>
</table></div>';
    return $ret;
}

add_shortcode('comparer', 'tableau_compartif_trottinettes');

/* FIN shortcode tableau comparatif */


/* DEBUT shortcode bouton centré */


function obtenir_bouton($atts)
{
    $atts = shortcode_atts(array(
        'texte' => 'pas de texte',
        'lien' => '#',
        'nouvelonglet' => 'non'
    ), $atts, 'bouton');
    
    $nouvelongletattr = '';
    
    if ($atts['nouvelonglet'] == 'oui')
        $nouvelongletattr = 'target="_blank"';
    
    
    $ret = '<div class="conteneur-bouton-fiche-principale">
<a class="bouton-fiche-principale" href="' . $atts['lien'] . '" ' . $nouvelongletattr . '>' . $atts['texte'] . ' <i class="fa fa-arrow-right"></i>
</a>
</div>';
    
    return $ret;
}
add_shortcode('bouton', 'obtenir_bouton');
/*FIN shortcode bouton centré */

/*DEBUT shortcode appel vers top 3 */
function vers_top3($atts)
{
    $ret = '
<h2>Envie de découvrir notre top 3 ? 😃❤️</h2>
<p>Nous avons comparé les meilleures offres du marché pour vous, n\'hésitez pas à les consulter !</p>
<p>
   Les meilleures <strong>trottinettes électriques pour adulte :</strong>  
</p>

<div class="conteneur-bouton-fiche-principale">
    <a class="bouton-fiche-principale" href="http://meilleure-trottinette-electrique.fr/index.php/notre-comparatif/#pour-adultes">Voir le top 3 pour adultes <i class="fa fa-arrow-right"></i></a>
    </div>

<p>
   Les meilleures <strong>trottinettes électriques pour enfant :</strong>
</p>

<div class="conteneur-bouton-fiche-principale">
    <a class="bouton-fiche-principale" href="http://meilleure-trottinette-electrique.fr/index.php/notre-comparatif/#pour-enfants">Voir le top 3 pour enfants <i class="fa fa-arrow-right"></i></a>
    </div>
';
    return $ret;
}

add_shortcode('verstop3', 'vers_top3');

/*FIN shortcode appel vers top 3*/

function recap_bref($atts)
{
    $atts = shortcode_atts(array(
        'nom' => 'Pas de nom',
        'lienimage' => '#',
        'lienoffre' => '#',
        'resume' => '',
        'vitessemax' => 'NC',
        'autonomie' => 'NC',
        'pliable' => 'NC',
        'poidsmax' => 'NC',
        'composition' => 'NC',
        'dimensions' => 'NC',
        'poids' => 'NC',
        'pointsforts'=> '',
        'pointsfaibles'=> '',
        'note'=> '0',
    ), $atts, 'comparer');
    
    $ret = '
    
    <h2>La '.$atts['nom']. '</h2>
    
    <div class="conteneur-resume-complet">
    <div class="resume-complet">
       

        <div class="ligne-perso">
            <div class="col-perso-5 conteneur-image">
                    <img src="'.$atts['lienimage'].'" width="250">

            </div>
            <div class="col-perso-5">
                <p><b>En bref : </b>'.$atts['resume'].'</p>
                </div>
        </div>
        
        <div class="ligne-perso">
                <div class="col-perso-5">
                        <h6><strong>Caractéristiques&nbsp;:</strong></h6>
                        <ul>
                                <li><strong>Vitesse Max :</strong> '.$atts['vitessemax'].' Km/h<strong><br>
                                </strong></li>
                                <li><strong>Autonomie : </strong>'.$atts['autonomie'].' Km<strong><br>
                                </strong></li>
                                <li><strong>Pliable : </strong>'.$atts['pliable'].'<strong><br>
                                </strong></li>
                                <li><strong>Poids Maximum : </strong>'.$atts['poidsmax'].' Kgs<strong><br>
                                </strong></li>
                                <li><strong>Composition&nbsp;:&nbsp; </strong>'.$atts['composition'].'<strong><br>
                                </strong></li>
                                <li><strong>Dimensions&nbsp;: </strong>'.$atts['dimensions'].'</li>
                                <li><strong>Poids&nbsp;: </strong>'.$atts['poids'].' kg<strong><br>
                                </strong></li>
                                </ul>
                </div>
                <div class="col-perso-5">
                    <div class="conteneur-notes-bouton-resume-bref">
                        <div class="conteneur-etoiles"><div class="etoiles">
                        ' . getStars($atts['note']) . '
                        </div></div>
                        <div class="conteneur-bouton-fiche-principale">
                                <a class="bouton-fiche-principale" href="'.$atts['lienoffre'].'" target="_blank">
                                    <span class="fa fa-amazon" ></span>
                                     Voir le prix
                                </a>
                                </div>
                    </div>
                </div>
            </div>
            <div class="ligne-perso voir-points-forts-faibles">
                    <div class="col-perso-10">
                         Voir les points positifs et négatifs
                         <i class="fa fa-plus plus"></i>
                    </div>
                   
                </div>
                <div class="ligne-perso">
                        <div class="col-perso-5 points-forts">
                           <h6>Les points forts</h6>
                           <ul>';
                           if ($atts['pointsforts'] != "") {
      
                            $array = explode(";", $atts['pointsforts']);
                            
                            foreach ($array as &$pointFort) {
                                $ret .= '<li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                       ' . $pointFort . '
                        </li>';
                            }
                        
                        }
                        else{
                          $ret.='<li>Pas de points forts.</li>';
                        }
                          $ret.= ' </ul>
                        </div>
                        <div class="col-perso-5 points-faibles">
                                <h6>Les points faibles</h6>
                                <ul>';
                                
                                if ($atts['pointsfaibles'] != "") {
       
                                    $array = explode(";", $atts['pointsfaibles']);
                                    foreach ($array as &$pointFort) {
                                        $ret .= '<li>
                                <i class="fa fa-times" aria-hidden="true"></i>
                               ' . $pointFort . '
                                </li>';
                                    }
                            
                                }
                                else{
                                  $ret.='<li>Pas de points faibles.</li>';
                                }
                                $ret.='</ul>
                            </div>
                   </div>
    </div>
</div>';
    return $ret;
}

add_shortcode('recapbref', 'recap_bref');



function recap_bref($atts)
{
    $atts = shortcode_atts(array(
        'nom' => 'Pas de nom',
        'lienimage' => '#',
        'lienoffre' => '#',
        'resume' => '',
        'vitessemax' => 'NC',
        'autonomie' => 'NC',
        'pliable' => 'NC',
        'poidsmax' => 'NC',
        'composition' => 'NC',
        'dimensions' => 'NC',
        'poids' => 'NC',
        'pointsforts'=> '',
        'pointsfaibles'=> '',
        'note'=> '0',
    ), $atts, 'comparer');
    
    $ret = '';
    return $ret;
}

add_shortcode('recapbref', 'recap_bref');
