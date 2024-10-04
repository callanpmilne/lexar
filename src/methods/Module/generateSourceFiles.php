<?php

require_once("../src/class/Module.php");

/**
 * Generate Source Files
 * 
 * Generate source files for a Lexar Module based on the configuration in
 * $module param.
 * 
 * @param LexarModule $module
 * @return array Key=>Value pairs where `Key` is the source file path and `Value` is the 
 *               source code
 */
function generateSourceFiles (
  LexarModule $module
) {
  $ucSingular = $module->name->UcSingular;
  $ucPlural = $module->name->UcPlural;
  $lcSingular = $module->name->LcSingular;
  $lcPlural = $module->name->LcPlural;

  return [
    sprintf( // src/class/Category.php
      '%s%s.php',
      'src/class/',
      $ucSingular
    ) => generateClassSourceFile($module),

    sprintf( // src/class/DetailedCategory.php
      '%s%s.php',
      'src/class/Detailed', 
      $ucSingular
    ) => generateDetailedClassSourceFile($module),

    sprintf( // src/common/form/create/category.php
      '%s%s.php',
      'src/common/form/create/',
      $lcSingular
    ) => generateFormSourceFile($module),
    
    sprintf( // src/methods/Category/createCategory.php
      '%s%s%s%s.php',
      'src/methods/',
      $ucSingular,
      '/create',
      $ucSingular
    ) => generateDBCreateSourceFile($module),

    sprintf( // src/methods/Category/fetchCategory.php
      '%s%s%s%s.php', 
      'src/methods/', 
      $ucSingular, 
      '/fetch', 
      $ucSingular
    ) => generateDBFetchSourceFile($module),

    sprintf( // src/methods/Category/fetchCategoryList.php
      '%s%s%s%s%s.php', 
      'src/methods/', 
      $ucSingular, 
      '/fetch', 
      $ucSingular,
      'List'
    ) => generateDBFetchListSourceFile($module),

    sprintf( // src/pages/admin/create/customer.php
      "%s%s.php", 
      'src/pages/admin/create/', 
      $lcSingular
    ) => generateAdminCreatePageSourceFile($module),

    sprintf( // src/pages/admin/list/customers.php
      '%s%s.php', 
      'src/pages/admin/list/', 
      $lcPlural
    ) => generateAdminListPageSourceFile($module),

    sprintf( // src/pages/admin/view/customer.php
      '%s%s.php', 
      'src/pages/admin/view/', 
      $lcSingular
    ) => generateAdminViewPageSourceFile($module),

    sprintf( // db/schema/Customer.php
      '%s%s.php', 
      'db/schema/', 
      $ucSingular
    ) => generateDBSchemaSourceFile($module),
  ];
}

/**
 * Summary of generateClassSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateClassSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php
/**
 * <?=$module->name->UcSingular?> Class
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateDetailedClassSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDetailedClassSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php
/**
 * Detailed<?=$module->name->UcSingular?> Class
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateFormSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateFormSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

  /**
  * Create <?=$module->name->UcSingular?> Form Component
  */
  
  include('../src/common/form/input/uuid.php');
  
  ?&gt;
  
  &lt;div 
    class="component-form"&gt;
  
    &lt;?=uuidField('<?=$module->name->UcSingular?> ID')?&gt; 
  
    &lt;div 
      class="component-form-field"&gt;
      &lt;label
        for="Create<?=$module->name->UcSingular?>InputName"&gt;
        <?=$module->name->UcSingular?> Name
      &lt;/label&gt;
  
      &lt;input 
        id="Create<?=$module->name->UcSingular?>InputName"
        name="<?=$module->name->LcSingular?>Name"
        type="input"
        tabindex="2" /&gt;
    &lt;/div&gt;
  
    &lt;div
      class="component-form-buttons"&gt;
  
      &lt;div style="display: flex; flex: 1;"&gt;&lt;/div&gt;
  
      &lt;button
        type="submit"&gt;
        Create
      &lt;/button&gt;
  
      &lt;input
        name="is_create_<?=$module->name->LcSingular?>_submit"
        type="hidden"
        value="1" /&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  
  &lt;style&gt;
    main {
      align-items: center;
    }
  &lt;/style&gt;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateDBCreateSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBCreateSourceFile (
  LexarModule $module
): string {
  ob_start();
  

  ?>&lt;?php
/**
 * DB Create <?=$module->name->UcSingular?>
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateDBFetchSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBFetchSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php
/**
 * DB Fetch <?=$module->name->UcSingular?>
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateDBFetchListSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBFetchListSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

$GLOBALS['<?=$module->name->LcPlural?>'] = [];

/**
 * Fetch <?=$module->name->UcSingular?> List
 * 
 * @return <?=$module->name->UcSingular?>[] <?=$module->name->UcSingular?> List
 */
function fetch<?=$module->name->UcSingular?>List () {

  if (count($GLOBALS['<?=$module->name->LcPlural?>']) &gt; 0) {
    return $GLOBALS['<?=$module->name->LcPlural?>'];
  }

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_<?=$module->name->LcPlural?>", 
    'SELECT * FROM public."<?=$module->name->UcPlural?>"'
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_<?=$module->name->LcPlural?>", 
    array()
  );

  $result = array_map(function ($cat) {

    if (is_null($cat['ParentID'])) {
      return new <?=$module->name->UcSingular?>(
        $cat['ID'],
        $cat['Name'],
        $cat['Path']
      );
    }

    return new <?=$module->name->UcSingular?>(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );

  }, pg_fetch_all($result));

  $GLOBALS['<?=$module->name->LcPlural?>'] = $result;

  return $result;
}

/**
 * Fetch Child <?=$module->name->UcSingular?> List
 * 
 * @param string $parentID
 * @return <?=$module->name->UcSingular?>[] <?=$module->name->UcSingular?> List
 */
function fetchChild<?=$module->name->UcSingular?>List (
  ?string $ParentID = null
) {
  
  $sth = $dbh-&gt;prepare('SELECT * 
    FROM `<?=$module->name->UcPlural?>`
    WHERE `ParentID` = ?');
  
  $sth-&gt;bindParam(1, $ParentID, PDO::PARAM_STR, 256);
  
  $sth-&gt;execute();

  $result = array_map(function ($cat) {
    return new <?=$module->name->UcSingular?>(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );
  }, $sth-&gt;fetchAll(PDO::FETCH_ASSOC));

  return $result;
}<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateAdminCreatePageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminCreatePageSourceFile (
  LexarModule $module
): string {
  if (!$module) {
    return '';
  }
  ob_start();
  
  ?>&lt;?php

require_once('../src/class/<?=$module->name->UcSingular?>.php');
require_once('../src/methods/<?=$module->name->UcSingular?>/create<?=$module->name->UcSingular?>.php');

/**
 * Create <?=$module->name->UcSingular?> Page
 */

$isCreate<?=$module->name->UcSingular?>Submit = 
  array_key_exists('is_create_<?=$module->name->LcSingular?>_submit', $_POST)
    && '1' === $_POST['is_create_<?=$module->name->LcSingular?>_submit'];

if ($isCreate<?=$module->name->UcSingular?>Submit) {
  
  // <?=$module->name->UcSingular?> ID
  $<?=$module->name->LcSingular?>ID = $_POST['uuid'];

  // <?=$module->name->UcSingular?> Name
  $<?=$module->name->LcSingular?>Name = $_POST['<?=$module->name->LcSingular?>Name'];

  // attempt to create <?=$module->name->LcSingular?>
  
  $result = create<?=$module->name->UcSingular?>(new <?=$module->name->UcSingular?>(
    $<?=$module->name->LcSingular?>ID,
    $<?=$module->name->LcSingular?>Name
  ));

  // redirect user to <?=$module->name->LcSingular?> admin page on successful creation
  if (true === $result) {
    ?&gt;
    &lt;script&gt;"use strict"; (function (w) {
      const <?=$module->name->LcSingular?>URI = '/admin/view/<?=$module->name->LcSingular?>/&lt;?=$<?=$module->name->LcSingular?>ID?&gt;';
      w.location.assign(<?=$module->name->LcSingular?>URI);
    })(window);&lt;/script&gt;
    &lt;?php
    exit(1);
  }

}
?&gt;

&lt;main&gt;
  &lt;div id="PageTitle"&gt;
    &lt;h1&gt;Create <?=$module->name->UcSingular?>&lt;/h1&gt;

    &lt;p class="breadcrumbs"&gt;
      &lt;a href="/admin"&gt;
        &larr; Admin Dashboard
      &lt;/a&gt;
    &lt;/p&gt;
  &lt;/div&gt;

  &lt;form 
    action="/admin/create/<?=$module->name->LcSingular?>" 
    method="POST"&gt;
    &lt;?php include('../src/common/form/create/<?=$module->name->LcSingular?>.php'); ?&gt;
  &lt;/form&gt;

  &lt;?php if ($isCreate<?=$module->name->UcSingular?>Submit) : ?&gt;
    &lt;div
      class="component-form-login-debug"&gt;
      &lt;h2&gt;Debug&lt;/h2&gt;
      &lt;pre&gt;&lt;?php var_dump($_POST); ?&gt;&lt;/pre&gt;
    &lt;/div&gt;
  &lt;?php endif; ?&gt;
&lt;/main&gt;

&lt;style&gt;
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }
&lt;/style&gt;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateAdminListPageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminListPageSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

  /**
   * <?=$module->name->UcSingular?> List
   * 
   * Shows a list of <?=$module->name->UcPlural?>
   */
  
  require_once('../src/class/<?=$module->name->UcSingular?>.php');
  require_once('../src/methods/<?=$module->name->UcSingular?>/fetch<?=$module->name->UcSingular?>List.php');
  
  $<?=$module->name->LcPlural?> = fetch<?=$module->name->UcSingular?>List();
  
  ?&gt;
  
  &lt;main&gt;
    &lt;div id="PageTitle"&gt;
      &lt;h1&gt;<?=$module->name->UcSingular?> List&lt;/h1&gt;
  
      &lt;p class="breadcrumbs"&gt;
        &lt;a href="/admin"&gt;
          &larr; Admin Dashboard
        &lt;/a&gt;
      &lt;/p&gt;
    &lt;/div&gt;
  
    &lt;table&gt;
      &lt;thead&gt;
        &lt;tr&gt;
          &lt;th&gt;Name&lt;/th&gt;
          &lt;th&gt;Path&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/thead&gt;
  
      &lt;tbody&gt;
        &lt;?php foreach ($<?=$module->name->LcPlural?> as $<?=$module->name->LcSingular?>) : ?&gt;
          &lt;tr&gt;
            &lt;td class="view-link"&gt;
              &lt;a href="/admin/view/<?=$module->name->LcSingular?>/&lt;?=$<?=$module->name->LcSingular?>-&gt;ID?&gt;"&gt;
                &lt;?=$<?=$module->name->LcSingular?>-&gt;Name?&gt;
              &lt;/a&gt;
            &lt;/td&gt;
  
            &lt;td&gt;
              /&lt;?=$<?=$module->name->LcSingular?>-&gt;Path?&gt;
            &lt;/td&gt;
          &lt;/tr&gt;
        &lt;?php endforeach; ?&gt;
      &lt;/tbody&gt;
    &lt;/table&gt;
  &lt;/main&gt;
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

/**
 * Summary of generateAdminViewPageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminViewPageSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php
/**
 * Admin View <?=$module->name->UcSingular?> Page
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}

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

