CREATE TABLE public."CustomerNotes" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "NoteID" uuid NOT NULL,  
  "CustomerID" uuid NOT NULL,
  "Recorded" bigint NOT NULL,
  CONSTRAINT "CustomerNoteID" PRIMARY KEY ("ID"),
  CONSTRAINT "NoteCustomerID" UNIQUE ("NoteID", "CustomerID")
); 

ALTER TABLE IF EXISTS 
  public."CustomerNotes" 
    OWNER to postgres;