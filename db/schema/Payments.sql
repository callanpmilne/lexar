CREATE TABLE public."Payments" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "Amount" bigint NOT NULL,
  "CurrencyID" uuid NOT NULL,
  "FeeAmount" bigint NOT NULL DEFAULT 0,
  "FeeCurrencyID" uuid NOT NULL,
  "PaymentProcessorID" uuid NOT NULL,
  "Received" bigint NOT NULL,
  CONSTRAINT "PaymentID" PRIMARY KEY ("ID")
); 

ALTER TABLE IF EXISTS 
  public."Payments" 
    OWNER to postgres;