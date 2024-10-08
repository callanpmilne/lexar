CREATE TABLE IF NOT EXISTS public."EntityName"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "Label" character varying(120) COLLATE pg_catalog."default" NOT NULL,
  "NiceName" character varying(80) COLLATE pg_catalog."default" NOT NULL,
  "PascalCaseName" character varying(80) COLLATE pg_catalog."default" NOT NULL,
  "CamelCaseName" character varying(80) COLLATE pg_catalog."default" NOT NULL,
  "SnakeCaseName" character varying(80) COLLATE pg_catalog."default" NOT NULL,
  "PluralReplacements" character varying(255) COLLATE pg_catalog."default" NOT NULL DEFAULT 'y$=ies'::character varying,
  CONSTRAINT "EntityNameID" PRIMARY KEY ("ID")
)

ALTER TABLE IF EXISTS public."EntityName"
  OWNER to callanmilne;