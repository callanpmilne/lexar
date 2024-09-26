CREATE TABLE public."SocialProfiles" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "URL" character varying(255) NOT NULL,
  "Created" bigint NOT NULL,
  CONSTRAINT "SocialProfileID" PRIMARY KEY ("ID")
); 

ALTER TABLE IF EXISTS 
  public."SocialProfiles" 
    OWNER to postgres;