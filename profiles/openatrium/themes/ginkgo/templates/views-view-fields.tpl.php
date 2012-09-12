<?php $i = 0; ?>
<?php if ($enable_grouping): ?><div class='grouped clear-block <?php print $classes ?>'><?php endif; ?>
<?php foreach ($grouped as $group => $fields): ?>

  <?php if ($enable_grouping): ?><div class='grouped-<?php print $group ?> clear-block'><?php endif; ?>
 <?php if ($view->name == 'blog_comments' && $group == 'content') { 
     //CAR was here
     $result = db_query("select oa.group_nid, pu.value, no.title from og_ancestry oa, purl pu, node no where oa.nid = %d and oa.group_nid = pu.id and no.nid = pu.id;", $view->result[$i++]->node_comments_nid);
     $row = db_fetch_object($result);
     if ($row) {
       $groupurl = $row->value;
       $groupname = $row->title;
       print '<a class="groupinfo" href="/'.$groupurl.'">'.$groupname.'</a>'; 
     }
}?>
    <?php foreach ($fields as $id => $field): ?>
      <?php if (!empty($field->content)): ?>
        <?php if (!empty($field->separator)): ?>
          <?php print $field->separator; ?>
        <?php endif; ?>
        <<?php print $field->inline_html;?> class="views-field <?php print $field->class; ?>">
          <?php if ($field->label): ?>
            <label><?php print $field->label; ?></label>
            <<?php print $field->element_type; ?> class="field-content"><?php print $field->content; ?></<?php print $field->element_type; ?>>
          <?php else: ?>
            <?php print $field->content; ?>
          <?php endif; ?>
        </<?php print $field->inline_html;?>>
      <?php endif; ?>

    <?php endforeach; ?>

  <?php if ($enable_grouping): ?></div><?php endif; ?>
   

<?php endforeach; ?>
