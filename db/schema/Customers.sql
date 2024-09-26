CREATE TABLE public."Customers"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "Name" character varying(255) NOT NULL,
  CONSTRAINT "CustomerID" PRIMARY KEY ("ID")
);

ALTER TABLE IF EXISTS public."Customers"
  OWNER to postgres;