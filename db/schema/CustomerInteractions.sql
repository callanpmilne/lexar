CREATE TABLE public."CustomerInteractions" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "NoteID" uuid NOT NULL,  
  "CustomerID" uuid NOT NULL,
  "StartTime" bigint NOT NULL,
  "EndTime" bigint DEFAULT NULL,
  "MediumID" uuid NOT NULL,
  CONSTRAINT "CustomerInteractionID" PRIMARY KEY ("ID"),
  CONSTRAINT "InteractionNoteCustomerID" UNIQUE ("NoteID", "CustomerID")
); 

ALTER TABLE IF EXISTS 
  public."CustomerInteractions" 
    OWNER to postgres;