namespace OOP
{
    public class TestProgram
    {
        static void Main(string[] args)
        {
            Location locationRect = new Location(10, 15);
            Location locationCerc = new Location(8, 8);
            int radius = 5;
            Circle cerc1 = new Circle(radius);
            Rectangle rect1 = new Rectangle(2, 3);
            // Testare functionalitatea Location
            Location cursorLocation = new Location(10, 8);
            if (CheckCircle(cursorLocation, locationCerc, radius))
            {
                // Testarea clasei Cerc
                Console.Write("Aria cercului este: ");
                cerc1.Area();
                Console.WriteLine(cerc1.ToString());
                Console.Write("Perimetrul cercului este: ");
                cerc1.Perimeter();
                Console.WriteLine(cerc1.ToString());
            }
            else if (CheckRect(cursorLocation, locationRect, rect1))
            {
                // Testarea clasei Dreptunghi
                Console.Write("Aria dreptunghiului este: ");
                rect1.Area();
                Console.WriteLine(rect1.ToString());
                Console.Write("Perimetrul dreptunghiului este: ");
                rect1.Perimeter();
                Console.WriteLine(rect1.ToString());
            }
            else
            {
                Console.WriteLine("Nu stiu frate ce are, la mine mergea..");
            }

        }

        public static bool CheckCircle(Location pointLocation, Location circleLocation, int radius)
        {
            if (Math.Sqrt((pointLocation.x - circleLocation.x) * (pointLocation.x - circleLocation.x) + (pointLocation.y - circleLocation.y) * (pointLocation.y - circleLocation.y)) <= radius)
            {
                Console.WriteLine("Punctul se afla in cerc");
                return true;
            }
            else
            {
                Console.WriteLine("Punctul se afla inafara cercului");
                return false;
            }
        }

        public static bool CheckRect(Location pointLocation, Location rectLocation, Rectangle rect)
        {
            if (pointLocation.x >= rectLocation.x && pointLocation.x <= (rectLocation.x + rect.side1) && pointLocation.y >= rectLocation.y && pointLocation.y <= (rectLocation.y + rect.side2))
            {
                Console.WriteLine("Punctul se afla in dreptunghi");
                return true;
            }
            else
            {
                Console.WriteLine("Punctul se afla inafara dreptunghiului");
                return false;
            }
        }
    }
}
