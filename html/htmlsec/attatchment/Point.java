package Exercices;

public class Point {
 private double x;
 private double y;
	public Point(double x,double y) {
		// TODO Auto-generated constructor stub
		this.x=x;
		this.y=y;
	}
	public Point()
	{
		x=0;
		y=0;
	}
	public  double Getx()
	{
		return x; 
	}
	public  double Gety()
	{
		return y;
	}

	public void Setx(double x)
	{
		if(x>0)
		this.x=x;
	}
	public void Sety(double y)
	{
		if(y>0)
		this.y=y;
	}
	
public double CalculerDistance(Point p)
{
	return Math.sqrt(Math.pow(this.x-p.x,2)+Math.pow(this.y-p.y, 2));
}
public Point CalculerMilieu(Point p) {
	Point M=new Point();
	M.Setx((this.x+p.x)/2);
	M.Sety((this.y+p.y)/2);
	return M;
}
@Override
public String toString() {
	return "Point [x=" + x + ", y=" + y + "]";
}
	

}
