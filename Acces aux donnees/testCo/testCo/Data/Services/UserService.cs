using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using testCo.Data.Models;

namespace testCo.Data.Services
{
    class UserService
    {
        private readonly MyDbContext _context;

        public UserService(MyDbContext context)
        {
            _context = context;
        }

        public void AddUser(User obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Users.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteUser(User obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Users.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<User> GetAllUsers()
        {
            return _context.Users.ToList();
        }

        public User GetUserById(int id)
        {
            return _context.Users.FirstOrDefault(obj => obj.Id == id);
        }

        public User GetUserByLibelle(string libelle)
        {
            return _context.Users.FirstOrDefault(obj => obj.Identifiant == libelle);
        }

        public void UpdateUser(User obj)
        {
            _context.SaveChanges();
        }
    }
}
