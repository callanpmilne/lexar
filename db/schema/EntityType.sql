CREATE TABLE IF NOT EXISTS public."EntityType"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "ParentID" uuid,
  "EntityNameID" uuid NOT NULL,
  "IsAbstract" boolean NOT NULL DEFAULT false,
  CONSTRAINT "EntityTypeID" PRIMARY KEY ("ID")
)

ALTER TABLE IF EXISTS public."EntityType"
  OWNER to callanmilne;