CREATE TABLE IF NOT EXISTS public."Entity"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "TypeID" uuid NOT NULL,
  CONSTRAINT "Entity_pkey" PRIMARY KEY ("ID")
)

ALTER TABLE IF EXISTS public."Entity"
  OWNER to callanmilne;