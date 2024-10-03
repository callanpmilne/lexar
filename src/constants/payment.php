<?php

/**
 * Payment Constants
 */

/**
 * Payment Processor UUIDs
 * 
 * ---------------------------------------------------
 * | Constant                 | Description          |
 * ---------------------------------------------------
 * | UUID_PAYMENT_DEFAULT     | Default Processor    |
 * | UUID_PAYMENT_PRIMARY     | Primary Processor    |
 * | UUID_PAYMENT_SECONDARY   | Secondary Processor  |
 * | UUID_PAYMENT_BANK        | Bank Processor       |
 * | UUID_PAYMENT_CASH        | Cash Processor       |
 * | UUID_PAYMENT_OTHER       | Other Processor      |
 * ---------------------------------------------------
 */

define( // Default Payment Processor UUID
  'UUID_PAYMENT_DEFAULT',
  'b93ed6e6-699d-41da-be6c-e5c745d441f3'
);

define( // Primary Payment Processor UUID
  'UUID_PAYMENT_PRIMARY',
  'e935f126-98b1-40df-8a7b-9c3bdfd4735b'
);

define( // Secondary Payment Processor UUID
  'UUID_PAYMENT_SECONDARY',
  '18c136f4-5be9-493b-9171-20ea0d28bcac'
);

define( // Bank Payment Processor UUID
  'UUID_PAYMENT_BANK',
  '54a58938-26ec-4fb4-974f-728bb3b60e40'
);

define( // Cash Payment Processor UUID
  'UUID_PAYMENT_CASH',
  '54592dbc-6530-4c9b-a3f6-55ef3b58b0d5'
);

define( // Other Payment Processor UUID
  'UUID_PAYMENT_OTHER',
  '00381823-f46d-4476-ab6f-ee7111425933'
);
