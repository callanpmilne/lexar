CREATE TABLE public."Hashes" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "UserID" uuid NOT NULL,
  "HashValue" character varying(255) NOT NULL, 
  CONSTRAINT "HashID" PRIMARY KEY ("ID"),
  CONSTRAINT "HashUserID" UNIQUE ("UserID")
); 

ALTER TABLE IF EXISTS 
  public."Hashes" 
    OWNER to postgres;