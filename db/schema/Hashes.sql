CREATE TABLE public."Hashes" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "HashValue" character varying(255) NOT NULL, 
  CONSTRAINT "HashID" PRIMARY KEY ("ID")
); 

ALTER TABLE IF EXISTS 
  public."Hashes" 
    OWNER to postgres;