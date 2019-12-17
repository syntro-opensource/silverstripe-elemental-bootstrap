<% if isCol %>
  <div class="card__container $LayoutClasses $OuterClasses data-listelement-count="$Elements.Elements.Count"">
    <div class="bootstrap-card__container__card card $InnerClasses">
<% else %>
  <div class="bootstrap-card__container__card card $InnerClasses" data-listelement-count="$Elements.Elements.Count">
<% end_if %>
    $Elements
  </div>
<% if isCol %>
  </div>
<% end_if %>
