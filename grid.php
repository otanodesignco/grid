<?php
class Grid
{
	private $tiers;
	private $cells;
	private $treeGrid;
	private $template;
	private $built;
	
	public function __construct( $tier, $positions, $template )
	{
		$this->tiers = $tier;
		$this->cells = $positions;
		$this->template = $template;
		$this->built = false;
	}
	
	public function Tiers( $tiers )
	{
		if( $this->built ) // if build method was called rebuild it with the new tier number
		{
			$this->tiers = $tiers;
			
			$this->Build();
		}
		else
		{
			$this->tiers = $tiers;
		}
	}
	
	public function Add( $tier, $position, $template )
	{
		if( $this->built )
		{
			$this->treeGrid[$tier - 1][$position - 1] = $template;
		}
	}
	
	public function Cells( $positions )
	{
		if( $this->built ) // if build method was called rebuild it with the new tier number
		{
			$this->cells = $positions;
			
			$this->Build();
		}
		else
		{
			$this->cells = $positions;
		}
	}
	
	public function Teamplate( $template )
	{
		if( $this->built ) // if build method was called rebuild it with the new tier number
		{
			$this->template = $template;
			
			$this->Build();
		}
		else
		{
			$this->template = $template;
		}
	}
	
	// builds a grid with a 2d array filled with a default template as the place holder
	public function Build()
	{
		$this->treeGrid = array_fill( 0, $this->tiers, array_fill( 0, $this->cells, $this->template ) );
		$this->built = true;
	}
	
	public function Get()
	{
		if( $this->built ) // if build method was called rebuild it with the new tier number
		{
			return $this->treeGrid;
		}
		else
		{
			$this->Build();
			
			return $this->treeGrid;
		}
	}
}

?>
