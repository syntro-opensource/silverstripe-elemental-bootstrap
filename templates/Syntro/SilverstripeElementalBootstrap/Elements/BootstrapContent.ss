<% if isCol %>
  <div class="$LayoutClasses $OuterClasses">
    $Content
  </div>
<% else %>
  <div class="$InnerClasses">
    $Content
  </div>
<% end_if %>

