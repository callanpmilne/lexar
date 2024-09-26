CREATE TABLE public."Users" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "Username" character varying(255) NOT NULL, 
  "Name" character varying(255) NOT NULL,   
  "IsSuperAdmin" BOOLEAN DEFAULT FALSE, 
  CONSTRAINT "UserID" PRIMARY KEY ("ID"),
  CONSTRAINT "UserUsername" UNIQUE ("Username")
); 

ALTER TABLE IF EXISTS 
  public."Users" 
    OWNER to postgres;