<% if isCol %>
  <div class="$LayoutClasses $OuterClasses">
    <div class="alert alert-$AlertType $InnerClasses">
<% else %>
  <div class="alert alert-$AlertType $InnerClasses">
<% end_if %>
    <% if $ShowTitle %>
      <h2 class="list-element__title">$Title</h2>
    <% end_if %>
    $Content
  </div>
<% if isCol %>
</div>
<% end_if %>