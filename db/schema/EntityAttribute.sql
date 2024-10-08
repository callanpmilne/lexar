CREATE TABLE IF NOT EXISTS public."EntityAttribute"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "EntityTypeID" uuid NOT NULL,
  "EntityNameID" uuid NOT NULL,
  "ValueType" character varying COLLATE pg_catalog."default" NOT NULL,
  "DefaultValue" character varying COLLATE pg_catalog."default" NOT NULL,
  "Optional" boolean NOT NULL DEFAULT false,
  "DisplayOrder" bigint NOT NULL DEFAULT 10,
  CONSTRAINT "EntityAttribute_pkey" PRIMARY KEY ("ID")
)

ALTER TABLE IF EXISTS public."EntityAttribute"
  OWNER to callanmilne;