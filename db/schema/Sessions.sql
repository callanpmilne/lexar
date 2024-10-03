CREATE TABLE public."Sessions" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "UserID" uuid NOT NULL,
  "SecretKey" character varying(255) NOT NULL, 
  "Started" bigint NOT NULL, 
  "Expiry" bigint DEFAULT NULL, 
  CONSTRAINT "SessionID" PRIMARY KEY ("ID"),
  CONSTRAINT "SessionUserSecretKey" UNIQUE ("UserID", "SecretKey")
); 

ALTER TABLE IF EXISTS 
  public."Sessions" 
    OWNER to postgres;