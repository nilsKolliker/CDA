using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Gestion_de_fichier
{
    class Truc
    {
        public int Id { get; private set; }
        public string Nom { get; set; }
        public int Note { get; private set; }
        public static int Compteur { get; private set; } = 0;
        private static Random Rng { get; set; } = new Random();

        public Truc(string nom)
        {
            Id = ++Compteur;
            Nom = nom;
            Note = Rng.Next(20)+1;
        }

        [JsonConstructor]
        public Truc(int id, string nom, int note)
        {
            Id = id;
            Nom = nom;
            Note = note;
        }
    }
}
