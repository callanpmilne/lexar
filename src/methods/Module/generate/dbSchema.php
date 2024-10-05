<?php

/**
 * Summary of generateDBSchemaSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBSchemaSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>CREATE TABLE public."<?=$module->name->UcPlural?>"
(
  "ID" uuid NOT NULL DEFAULT gen_random_uuid(),
  "Name" character varying(255) NOT NULL,
  "ParentID" uuid DEFAULT NULL,
  "Created" bigint NOT NULL,
  CONSTRAINT "<?=$module->name->UcSingular?>ID" PRIMARY KEY ("ID"),
  CONSTRAINT "<?=$module->name->UcSingular?>Path" UNIQUE ("Path")
);

ALTER TABLE IF EXISTS public."<?=$module->name->UcPlural?>"
  OWNER to postgres;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
