<ul class="links inline-list">
<% loop Links %>
	<li id="link-{$ID}" class="$LinkingMode"><a class="$LinkingMode" href="$URLSegment">$MenuTitle</a></li>
<% end_loop %>
</ul>
