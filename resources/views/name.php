
<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

$anData = array(1144,
1200,1177,1601,1171,1207,1251,1087,1016,1149,1667,1583,1022,1199,1526,1564,1309,1485,1287,1167,1339,1253,1060,1199,1432,1669,1782,1638,1769,1774,1800,1880,1860,1810);




print_r(forecastHoltWinters($anData));

function forecastHoltWinters($anData, $nForecast =1, $nSeasonLength =6, $nAlpha =0.2, $nBeta = 0.05, $nGamma = 0.01, $nDevGamma = 0.1) {

// Calculate an initial trend level
$nTrend1 = 0;
for($i = 0; $i < $nSeasonLength; $i++) {
  $nTrend1 += $anData[$i];
}
$nTrend1 /= $nSeasonLength;

$nTrend2 = 0;
for($i = $nSeasonLength; $i < 2*$nSeasonLength; $i++) {
  $nTrend2 += $anData[$i];
}
$nTrend2 /= $nSeasonLength;

$nInitialTrend = ($nTrend2 - $nTrend1) / $nSeasonLength;

// Take the first value as the initial level
$nInitialLevel = $anData[0];

// Build index
$anIndex = array();
foreach($anData as $nKey => $nVal) {
  $anIndex[$nKey] = $nVal / ($nInitialLevel + ($nKey + 1) * $nInitialTrend);
}

// Build season buffer
$anSeason = array_fill(0, count($anData), 0);
for($i = 0; $i < $nSeasonLength; $i++) {
  $anSeason[$i] = ($anIndex[$i] + $anIndex[$i+$nSeasonLength]) / 2;
}

// Normalise season
$nSeasonFactor = $nSeasonLength / array_sum($anSeason);
foreach($anSeason as $nKey => $nVal) {
  $anSeason[$nKey] *= $nSeasonFactor;
}

$anHoltWinters = array();
$anDeviations = array();
$nAlphaLevel = $nInitialLevel;
$nBetaTrend = $nInitialTrend;
foreach($anData as $nKey => $nVal) {
  $nTempLevel = $nAlphaLevel;
  $nTempTrend = $nBetaTrend;

  $nAlphaLevel = $nAlpha * $nVal / $anSeason[$nKey] + (1.0 - $nAlpha) * ($nTempLevel + $nTempTrend);
  $nBetaTrend = $nBeta * ($nAlphaLevel - $nTempLevel) + ( 1.0 - $nBeta ) * $nTempTrend;

  $anSeason[$nKey + $nSeasonLength] = $nGamma * $nVal / $nAlphaLevel + (1.0 - $nGamma) * $anSeason[$nKey];

  $anHoltWinters[$nKey] = ($nAlphaLevel + $nBetaTrend * ($nKey + 1)) * $anSeason[$nKey];
  $anDeviations[$nKey] = $nDevGamma * abs($nVal - $anHoltWinters[$nKey]) + (1-$nDevGamma) 
              * (isset($anDeviations[$nKey - $nSeasonLength]) ? $anDeviations[$nKey - $nSeasonLength] : 0);
}

$anForecast = array();
$nLast = end($anData);
for($i = 1; $i <= $nForecast; $i++) {
   $nComputed = round($nAlphaLevel + $nBetaTrend * $anSeason[$nKey + $i]);
   if ($nComputed < 0) { // wildly off due to outliers
     $nComputed = $nLast;
   }
   $anForecast[] = $nComputed;
}
echo "THE PREDICTED AMOUNT THROUGHOUT THE NEXT MONTH ARE ";
echo($anForecast[0]); echo('<br>');

}
?>