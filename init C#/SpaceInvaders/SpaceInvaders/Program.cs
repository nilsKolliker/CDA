using System;

namespace SpaceInvaders
{
    class Program
    {
        static void Main(string[] args)
        {
            Invaders truc = new Invaders();
            Space test = new Space(4, 3, truc);
            Console.WriteLine(test);
        }
    }
}
