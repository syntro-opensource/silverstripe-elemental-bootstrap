<% if isCol %>
  <div class="list-element__container $LayoutClasses $OuterClasses" data-listelement-count="$Elements.Elements.Count">
    <div class="bootstrap-card card $InnerClasses">
<% else %>
  <div class="bootstrap-card card $InnerClasses" data-listelement-count="$Elements.Elements.Count">
<% end_if %>
    <% if CardImageTop %>
      <img class="bootstrap-card__image-top card-img-top" src="$CardImageTop.URL" alt="top">
    <% end_if %>
    <div class="bootstrap-card__body card-body">
      <% if $ShowTitle %>
        <h3 class="bootstrap-card__title">$Title</h3>
      <% end_if %>
      $Body
    </div>
    <% if CardImageBottom %>
      <img class="bootstrap-card__image-bottom card-img-bottom" src="$CardImageBottom.URL" alt="top">
    <% end_if %>
  </div>
<% if isCol %>
</div>
<% end_if %>
