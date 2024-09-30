CREATE TABLE public."UserHashes"
(
  "UserHashID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "UserID" uuid NOT NULL,
  "HashID" uuid NOT NULL,
  "Type" character varying(100) NOT NULL DEFAULT 'PASSWORD',
  "Created" bigint NOT NULL,
  "LastModified" bigint NOT NULL,
  CONSTRAINT "ID" PRIMARY KEY ("UserHashID"),
  CONSTRAINT "UserID" FOREIGN KEY ("UserID")
    REFERENCES public."Users" ("ID") MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID,
  CONSTRAINT "HashID" FOREIGN KEY ("HashID")
    REFERENCES public."Hashes" ("ID") MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID
);

ALTER TABLE IF EXISTS public."UserHashes"
  OWNER to postgres;