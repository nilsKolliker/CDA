using Microsoft.EntityFrameworkCore;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Services
{
    public class PersonnesServices
    {

        private readonly PersonneAnimalContext _context;

        public PersonnesServices(PersonneAnimalContext context)
        {
            _context = context;
        }

        public void AddPersonne(Personne obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Personnes.Add(obj);
            _context.SaveChanges();
        }

        public void DeletePersonne(Personne obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Personnes.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Personne> GetAllPersonnes()
        {
            return _context.Personnes.Include("Sexe").Include("Adoptions.Animal").ToList();
        }

        public Personne GetPersonneById(int id)
        {
            return _context.Personnes.Include("Sexe").Include("Adoptions.Animal").FirstOrDefault(obj => obj.IdPersonne == id);
        }

        public void UpdatePersonne(Personne obj)
        {
            _context.Update(obj);
            _context.SaveChanges();
        }


    }
}
