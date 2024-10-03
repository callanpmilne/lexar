<?php

/**
 * Payment List
 * 
 * Shows a list of Payments
 */

require_once('../src/class/Payment.php');
require_once('../src/methods/Payment/fetchPaymentList.php');

$payments = fetchPaymentList();

?>

<main>
  <div id="PageTitle">
    <h1>Payment List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th class="wide">Payment ID</th>
        <th style="text-align: left;">Processor Method</th>
        <th style="text-align: left;">Received</th>
        <th style="text-align: right;">Amount</th>
        <th style="text-align: right;">Fee</th>
        <th style="text-align: right;">Total</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($payments as $payment) : ?>
        <tr>
          <th class="view-link">
            <a href="/admin/view/payment/<?=$payment->ID?>">
              <?=$payment->ID?>
            </a>
          </th>

          <td style="text-align: left;">
            <?=$payment->PaymentProcessorID?>
          </td>

          <td style="text-align: left;">
            <?=date('d/m/y H:i', $payment->Received)?>
          </td>

          <td style="text-align: right;">
            US&dollar;
            <?=$payment->getSubTotal('.')?>
          </td>

          <td style="text-align: right;">
            US&dollar;
            <?=$payment->getFeeAmount('.')?>
          </td>

          <td style="text-align: right;">
            US&dollar;
            <?=$payment->getAmount('.')?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>