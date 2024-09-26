CREATE TABLE public."CustomerSocialProfiles" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "SocialProfileID" uuid NOT NULL,  
  "CustomerID" uuid NOT NULL,
  CONSTRAINT "CustomerSocialProfileID" PRIMARY KEY ("ID"),
  CONSTRAINT "CustomerIDSocialProfileID" UNIQUE ("SocialProfileID", "CustomerID")
); 

ALTER TABLE IF EXISTS 
  public."CustomerSocialProfiles" 
    OWNER to postgres;