<?php

$days = [
    1 => 'Lundi',
    2 => 'Mardi',
    3 => 'Mercredi',
    4 => 'Jeudi',
    5 => 'Vendredi',
    6 => 'Samedi',
    7 => 'Dimanche'
];

$months = [
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Aout',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
];

// $year = l'année liée au jour J, $monthNumber = le mois en Chiffre du jour J, $monthLetters = le mois en Lettres du jour J,
// nous effectuons une condition sur le parametre URL year, si present nous recuperons sa valeur sinon nous prenons l'année en cours  
if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = date('Y'); // Y = 2022  
}

// nous effectuons une condition sur le parametre URL month, si present nous recuperons sa valeur sinon nous prenons le mois en cours.  
if (isset($_GET['month'])) {
    $monthNumber = $_GET['month'];
} else {
    $monthNumber = date('n'); // n = 6  
};

// nous récuperons le mois en toute lettres à l'aide du tableau $months et l'index $monthNumber
$monthLetters = $months[$monthNumber];
// On utilise cal_days_in_month pour calculer le nombre de jours dans le mois (cal_gregorian, mois, année)
$totalDaysinMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);

// on utilise mktime pour trouver le timestamp du premier jour du mois exemple : mktime (Heure, Minute, Seconde, Mois, Jour, Année)
$firstDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, 1, $year)); // N = numéro du jour ex: Lundi = 1 Mercredi = 3 Dimanche = 7
$lastDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, $totalDaysinMonth, $year));

// On calcule le nombre total de cases de notre calendrier 
// Le nombre de cases vides avant 1 jour du mois correspond à ($firstDayinMonth - 1)
// Le nombre de cases vides après le dernier jour du mois correspond à (7 - $lastDayinMonth)
$totalCases = ($firstDayinMonth - 1) + $totalDaysinMonth + (7 - $lastDayinMonth);

// Nous allons calculer le timestamp de la 1ère case du calendrier :
// strtotime (2022 / 6 / 1 - "le nombre de cases vides avant le premier jour du mois" . days )
$firstCaseTimestamp = strtotime("$year-$monthNumber-1" . ' - ' . ($firstDayinMonth - 1) . 'days');


/**
 * fonction permettant de créer les dates correspondantes aux jours fériés français
 * @param int $year ex. 1979
 * @return array structure 'mm-dd' => 'jour férié'
 */
function getSpecialDays($year)
{
    // On definie le jour de pâque selon l'année choisie : on se base sur le 21 Mars
    $base = new DateTime("$year-03-21");
    $days = easter_days($year);
    // on formate cette date en format (yyyy-mm-dd) pour faciliter la manipulation par la suite
    $easterDay = $base->add(new DateInterval("P{$days}D"))->format('Y-n-d');

    $specialDays = [
        // On définie les jours fériés fixe : les classiquess 8 jours 
        // format de la clé : timestamp, la clé permettra d'obtenir le jour férié respectif
        strtotime("$year-1-1") => '1er janvier',
        strtotime("$year-5-1") => 'Fête du travail',
        strtotime("$year-5-8") => 'Victoire des allies',
        strtotime("$year-7-14") => 'Fete nationale',
        strtotime("$year-8-15") => 'Assomption',
        strtotime("$year-11-1") => 'Toussaint',
        strtotime("$year-11-11") => 'Armistice',
        strtotime("$year-12-25") => 'Noël',

        // Jour feries qui dependent du jour de pâque
        strtotime("$easterDay + 1 days") => 'Lundi de paques',
        strtotime("$easterDay + 39 days")  => 'Ascension',
        strtotime("$easterDay + 50 days") => 'Pentecote',

        // Anniversaires apprenants LHP8
        strtotime("$year-05-23") => 'Anousone <i class=" logoCalendar bi bi-balloon"></i>',
        strtotime("$year-09-21") => 'Sophie <i class=" logoCalendar bi bi-balloon-heart"></i>',
        strtotime("$year-10-11") => 'Jordan <i class=" logoCalendar bi bi-balloon"></i>',
        strtotime("$year-02-21") => 'Valentin <i class=" logoCalendar bi bi-balloon"></i>',
        strtotime("$year-12-21") => 'Alex <i class=" logoCalendar bi bi-balloon"></i>',
        strtotime("$year-12-20") => 'Micka <i class=" logoCalendar bi bi-balloon"></i>',
        strtotime("$year-04-10") => 'Stella <i class=" logoCalendar bi bi-balloon-heart"></i>',
    ];

    return $specialDays;
}

// a l'aide de la fonction getSpecialDays nous definissons un array $arraySpecialDays contenant le timstamp de tous les jours fériés
$arraySpecialDays = getSpecialDays($year);

// nous allons créer une fonction pour créer une case dans le calendrier 
// la fonction prend en compte trois paramètres : firstCaseTimestamp, le numéro de la case , le mois , le tableau de jours spéciaux
function createCase($firstCaseTimestamp, $caseNumber, $month, $arraySpecialDays)
{
    // nous allons calculer le timestamp de la case pour cela, on utilise la fonction strtotime 
    // strtotime (date('Y-m-d')) pour obtenir la date US Année / Mois / Jour, on rajoute la journée en fonction de la case d'où le -1
    $timestamp = strtotime(date('Y-m-d', $firstCaseTimestamp) . '+' . ($caseNumber - 1) . 'days');

    // Nous allons faire des conditions pour modifier les cases selon leurs timestamps.
    // si le timestamps est dans le tableau 
    if (array_key_exists($timestamp, $arraySpecialDays)) {
        return '<div class ="border border-dark text-center bg-warning case">' . date('j', $timestamp) . '<br>' . $arraySpecialDays[$timestamp] . '</div>';
    // si le timestamps est égale au jour j
    } elseif (date('Y-m-d', $timestamp) == date('Y-m-d')) {
        return '<div class ="border border-dark text-center bg-info case">' . date('j', $timestamp) . '</div>';
    // si le timestamps est égale au mois en cours 
    } elseif (date('n', $timestamp) == $month) {
        return '<div class ="border border-dark text-center case">' . date('j', $timestamp) . '</div>';
    // sinon la case est grisée 
    } else {
        return '<div class ="border border-dark text-center bg-secondary case">' . date('j', $timestamp) . '</div>';
    }
}
