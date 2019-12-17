<% if isCol %>
  <div class="$LayoutClasses $OuterClasses" data-listelement-count="$Elements.Elements.Count">
    <% if $ShowTitle %>
      <h2 class="list-element__title">$Title</h2>
    <% end_if %>
    <div class="list-element__container row $InnerClasses" >
      $Elements
    </div>
  </div>
<% else %>
  <% if $ShowTitle %>
    <h2 class="list-element__title">$Title</h2>
  <% end_if %>
  <div class="list-element__container row $InnerClasses" data-listelement-count="$Elements.Elements.Count">
    $Elements
  </div>
<% end_if %>