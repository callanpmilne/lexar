CREATE TABLE public."Categories"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "Path" character varying(255) NOT NULL,
  "Name" character varying(255) NOT NULL,
  "ParentID" uuid DEFAULT NULL,
  CONSTRAINT "CategoryID" PRIMARY KEY ("ID"),
  CONSTRAINT "CategoryPath" UNIQUE ("Path")
);

ALTER TABLE IF EXISTS public."Categories"
  OWNER to postgres;