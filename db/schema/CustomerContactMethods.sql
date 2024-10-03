CREATE TABLE public."CustomerContactMethods" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "ContactMethodID" uuid NOT NULL,  
  "CustomerID" uuid NOT NULL,
  "Added" bigint NOT NULL,
  CONSTRAINT "CustomerContactMethodID" PRIMARY KEY ("ID"),
  CONSTRAINT "ContactMethodCustomerID" UNIQUE ("ContactMethodID", "CustomerID")
); 

ALTER TABLE IF EXISTS 
  public."CustomerContactMethods" 
    OWNER to postgres;