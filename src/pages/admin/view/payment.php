<?php

/**
 * Payment
 * 
 * Shows a single Payment
 */

require_once('../src/class/Payment.php');
require_once('../src/methods/Payment/fetchPayment.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PaymentID = array_slice($pathParts, -1)[0];

$payment = fetchPayment($PaymentID);

?>

<main id="ViewPaymentPage">
  <div id="PageTitle">
    <h1>View Payment</h1>

    <p>
      <a href="/admin/list/payments">
        &larr; Return to Payment List
      </a>
    </p>
  </div>

  <section>
    <ul>
      <li>
        <h3>Received At</h3>
        <?=date('d/m/y H:i', $payment->Received)?>
      </li>

      <li>
        <h3>Total Amount</h3>
        US&dollar; <?=$payment->getAmount('.')?>
      </li>

      <li>
        <h3>Fee Amount</h3>
        US&dollar; <?=$payment->getFeeAmount('.')?>
      </li>

      <li>
        <h3>Amount</h3>
        US&dollar; <?=$payment->getSubTotal('.')?>
      </li>
    </ul>

    <ul>
      <li>
        <h3>ID</h3>
        <?=$payment->ID?>
      </li>

      <li>
        <h3>Currency ID</h3>
        <?=$payment->CurrencyID?>
      </li>

      <li>
        <h3>Fee Currency ID</h3>
        <?=$payment->FeeCurrencyID?>
      </li>

      <li>
        <h3>Processor Method ID</h3>
        <?=$payment->PaymentProcessorID?>
      </li>
    </ul>
  </section>
</main>

<style>
main#ViewPaymentPage section {
  display: flex;
  flex-direction: row-reverse;
  align-items: flex-start;
  justify-content: flex-start;
}

main#ViewPaymentPage h3 {
  margin: 0;
  font-size: 0.85rem;
  font-weight: 100;
  color: rgba(255,255,255,0.8);
}

main#ViewPaymentPage ul li {
  margin-bottom: 0.5rem;
}
</style>
