
CREATE TABLE IF NOT EXISTS public."ApiRoutes"
(
    "ApiRouteID" uuid NOT NULL DEFAULT gen_random_uuid(),
    "ApiID" uuid NOT NULL,
    "ParentID" uuid DEFAULT NULL,
    "Method" character varying(10) DEFAULT 'GET',
    "Path" character varying(255) DEFAULT 'v/1/0/0/A/status.json',
    "Created" bigint NOT NULL,
    CONSTRAINT "ApiID" PRIMARY KEY ("ID")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."ApiRoutes"
    OWNER to postgres;

GRANT INSERT, SELECT ON TABLE public."ApiRoutes" TO lexar;

GRANT ALL ON TABLE public."ApiRoutes" TO postgres;
