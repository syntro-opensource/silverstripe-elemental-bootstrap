<% if isCol %>
  <div class="$LayoutClasses $OuterClasses">
<% end_if %>
<div class="bootstrap-carousel $InnerClasses">
  <div id="bootstrap-carousel-$ID" class="bootstrap-carousel__wrap carousel slide $ExtraClass" data-ride="carousel">
    <% if $Indicators %>
      <ol class="bootstrap-carousel__wrap__indicators carousel-indicators">
        <% loop $Images %>
          <% if $First %>
            <li data-target="#bootstrap-carousel-$Up.ID" data-slide-to="$Up.listHelper($Pos)" class="active"></li>
          <% else %>
            <li data-target="#bootstrap-carousel-$Up.ID" data-slide-to="$Up.listHelper($Pos)"></li>
          <% end_if %>
        <% end_loop %>
      </ol>
    <% end_if %>
    <div class="bootstrap-carousel__wrap__images carousel-inner">
      <% loop $Images %>
        <div class="bootstrap-carousel__wrap__images__item carousel-item <% if $First %>active<% end_if %>">
          <img src="$URL" class="bootstrap-carousel__wrap__images__item__image d-block w-100" alt="$Title">
          <% if $Up.Captions %>
            <div class="bootstrap-carousel__wrap__images__item__caption carousel-caption d-none d-md-block">
              <p>$Title</p>
            </div>
          <% end_if %>
        </div>
      <% end_loop %>
    </div>
    <% if $Controls %>
      <a class="bootstrap-carousel__wrap__indicator-left carousel-control-prev" href="#bootstrap-carousel-$ID" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel__wrap__indicator-right carousel-control-next" href="#bootstrap-carousel-$ID" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    <% end_if %>
  </div>
</div>
<% if isCol %>
  </div>
<% end_if %>