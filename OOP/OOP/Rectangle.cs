namespace OOP
{
    public class Rectangle : Shape
    {
        public double side1 { get; set; }
        public double side2 { get; set; }
        public double rezultat;

        //  Constructor
        public Rectangle(double lungimea, double latimea)
        {
            this.side1 = lungimea;
            this.side2 = latimea;
        }

        //  Calculam aria si perimetrul dreptunghiului
        public override double Area()
        {
            // A = side1 * side2
            rezultat = side1 * side2;
            return rezultat;
        }

        public override double Perimeter()
        {
            // P = 2 * (side1 + side2)
            rezultat = 2 * (side1 + side2);
            return rezultat;
        }

        public override string ToString()
        {
            return string.Format("{0:0.00}", rezultat);
        }
    }
}
