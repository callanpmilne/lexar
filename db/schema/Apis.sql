CREATE TABLE IF NOT EXISTS public."Apis"
(
    "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
    "Description" character varying(150) COLLATE pg_catalog."default" DEFAULT NULL::character varying,
    "Created" bigint NOT NULL,
    CONSTRAINT "ApiID" PRIMARY KEY ("ID")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Apis"
    OWNER to postgres;

GRANT INSERT, SELECT ON TABLE public."Apis" TO lexar;

GRANT ALL ON TABLE public."Apis" TO postgres;

