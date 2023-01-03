namespace OOP
{
    public class Circle : Shape
    {
        protected double radius;
        public double rezultat;

        //  Constructor
        public Circle(double raza)
        {
            this.radius = raza;
        }

        //  Calculam aria si perimetrul cercului
        public override double Area()
        {
            // A = pi * r^2
            rezultat = Math.PI * radius * radius;
            return rezultat;
        }

        public override double Perimeter()
        {
            // P = 2 * pi * r
            rezultat = 2 * Math.PI * radius;
            return rezultat;
        }

        public override string ToString()
        {
            return string.Format("{0:0.00}", rezultat);
        }
    }
}
