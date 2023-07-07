package Exercices;

public class Complexe {

private final double Re;
private final  double  Im; 
public Complexe()
{
	this(0.0,0.0);
}
public Complexe(double re, double im) {
	
	Re = re;
	Im = im;
}
public Complexe(Complexe C)
{
	this(C.Re, C.Im);
}
@Override
public String toString() {
	if(Re==0)
		return Im+"i";
	if(Im==0)
	return	Re+"";
	if(Im<0)
		return Re+"-"+(-Im);
	return Re+"+"+Im+"i";
}
public final double getRe() {
	return Re;
}
public final double getIm() {
	return Im;
}
public Complexe AddComplex(Complexe c)
{
	 return new Complexe( this.Re+c.Re, this.Im+c.Im);
	
}
public Complexe SoustComplex(Complexe c)
{
	return new Complexe(this.Re-c.Re,this.Im-c.Im);
	
}
public Complexe MultComplex(Complexe c)
{
	return new 	Complexe ((this.Re*c.Re)+(this.Im*c.Im), (this.Re*c.Im) +(this.Im*c.Re));
	
}
public void DivComplex(Complexe c)
{
	System.out.println("Division : "+((this.Re*c.Re)+(this.Im*c.Im))+"+i"+ (this.Re*c.Im) +"+i"+(this.Im*c.Re));
	
}
	
	
}
