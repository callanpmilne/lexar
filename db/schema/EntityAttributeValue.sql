CREATE TABLE IF NOT EXISTS public."EntityAttributeValue"
(
  "EntityID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "EntityAttributeID" uuid NOT NULL,
  "Value" character varying(255) 
    COLLATE pg_catalog."default" DEFAULT NULL::character varying,
  "LastModified" bigint NOT NULL,
  CONSTRAINT "EntityAttributeValuePkey" 
    PRIMARY KEY ("EntityID", "EntityAttributeID")
)

ALTER TABLE IF EXISTS public."EntityAttributeValue"
  OWNER to callanmilne;