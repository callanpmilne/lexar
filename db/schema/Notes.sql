CREATE TABLE public."Notes" ( 
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(), 
  "Author" uuid NOT NULL,
  "ContentBody" text NOT NULL, 
  "Created" bigint NOT NULL,
  CONSTRAINT "NoteID" PRIMARY KEY ("ID")/*,
  CONSTRAINT "NoteAuthor" INDEX ("Author")*/
); 

ALTER TABLE IF EXISTS 
  public."Notes" 
    OWNER to postgres;