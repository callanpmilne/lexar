CREATE TABLE public."ContactMethods" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "Medium" character varying(255) NOT NULL, 
  "Identifier" character varying(255) NOT NULL,   
  "Added" bigint NOT NULL, 
  "Modified" bigint DEFAULT NULL, 
  CONSTRAINT "ContactMethodID" PRIMARY KEY ("ID"),
  CONSTRAINT "MediumID" UNIQUE ("Medium", "Identifier")
);

ALTER TABLE IF EXISTS 
  public."ContactMethods" 
    OWNER to postgres;

COMMENT ON COLUMN public."ContactMethods"."Medium"
    IS 'E.g. Phone, Email, Facebook';

COMMENT ON COLUMN public."ContactMethods"."Identifier"
	IS  'Unique Identifier on Medium (e.g. phone number or twitter handle)';