CREATE TABLE public."CustomerPayments" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "PaymentID" uuid NOT NULL,  
  "CustomerID" uuid NOT NULL,
  "Recorded" bigint NOT NULL,
  CONSTRAINT "CustomerPaymentID" PRIMARY KEY ("ID"),
  CONSTRAINT "PaymentCustomerID" UNIQUE ("PaymentID", "CustomerID")
); 

ALTER TABLE IF EXISTS 
  public."CustomerPayments" 
    OWNER to postgres;