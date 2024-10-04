<?php

/**
 * Organisation List
 * 
 * Shows a list of Organisations
 */

require_once('../src/class/DetailedOrganisation.php');
require_once('../src/methods/Organisation/fetchOrganisationList.php');

$organisations = fetchOrganisationList();

?>

<main>
  <div id="PageTitle">
    <h1>Organisation List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th class="wide">Name</th>
        <th>Account Opened</th>
        <th>Last Payment</th>
        <th style="text-align: right;">Revenue (TTL)</th>
        <th style="text-align: right;">Fees (TTL)</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($organisations as $organisation) : ?>
        <tr>
          <th>
            <?=$organisation->ID?>
          </th>

          <td class="wide view-link">
            <a href="/admin/view/organisation/<?=$organisation->ID?>">
              <?=htmlentities($organisation->Name)?>
            </a>
          </td>

          <td><?=$organisation->getAccountOpenedDate('d/m/y')?></td>

          <td><?=$organisation->getLastPaymentDate('d/m/y')?></td>

          <td style="text-align:right;"><?=getCurrencyAmount(
            $organisation->TotalPaymentsAmount
          )?></td>

          <td style="text-align:right;"><?=getCurrencyAmount(
            $organisation->TotalFeesAmount
          )?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<?php

function getCurrencyAmount (
  int $amount,
  string $currencySymbol = '$',
  string $currencyCode = 'USD',
  string $currencyLabel = 'United States Dollar',
  string $decimalSeparator = '.',
  string $thousandsSeparator = ',',
  string $currencySymbolPosition = 'PREFIX',
  int $decimalPlaces = 2
): string {
  $pow = pow(10, $decimalPlaces);
  return sprintf(
    '%s %d%s%s %s',
    'PREFIX' === $currencySymbolPosition 
      ? $currencySymbol : '',
    floor($amount / $pow),
    $decimalSeparator,
    str_pad(strval($amount % $pow), $decimalPlaces, '0'),
    $currencyCode
  );
}
