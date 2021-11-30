using Microsoft.EntityFrameworkCore;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Services
{
    public class AdoptionsServices
    {

        private readonly PersonneAnimalContext _context;

        public AdoptionsServices(PersonneAnimalContext context)
        {
            _context = context;
        }

        public void AddAdoption(Adoption obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Adoptions.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteAdoption(Adoption obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Adoptions.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Adoption> GetAllAdoptions()
        {
            return _context.Adoptions.Include("Animal").Include("Personne.Sexe").ToList();
        }

        public Adoption GetAdoptionById(int id)
        {
            return _context.Adoptions.FirstOrDefault(obj => obj.IdAdoption == id);
        }

        public void UpdateAdoption(Adoption obj)
        {
            _context.Update(obj);
            _context.SaveChanges();
        }


    }
}
